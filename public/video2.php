<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Audio/Video Example - Record Plugin for Video.js</title>

    <link href="//unpkg.com/video.js@7.20.1/dist/video-js.min.css" rel="stylesheet">
    <link href="//unpkg.com/videojs-record/dist/css/videojs.record.min.css" rel="stylesheet">
    <style>
        body {
            font-style: normal;
            font-family: Arial, Helvetica, sans-serif;
        }

        @media (prefers-color-scheme: light) {
            body {
                background-color: #f5f5f5;
            }
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1e1e1e;
                color: white;
            }
        }
    </style>

    <script src="//unpkg.com/video.js@7.20.1/dist/video.min.js"></script>
    <script src="//unpkg.com/recordrtc/RecordRTC.js"></script>
    <script src="//unpkg.com/webrtc-adapter/out/adapter.js"></script>

    <script src="//unpkg.com/videojs-record/dist/videojs.record.min.js"></script>

    <script>
        /* workaround browser issues */

        var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
        var isEdge = /Edge/.test(navigator.userAgent);

        function applyAudioWorkaround() {
            if (isSafari || isEdge) {
                if (isSafari && window.MediaRecorder !== undefined) {
                    // this version of Safari has MediaRecorder
                    // but use the only supported mime type
                    options.plugins.record.audioMimeType = 'audio/mp4';
                } else {
                    // support recording in safari 11/12
                    // see https://github.com/collab-project/videojs-record/issues/295
                    options.plugins.record.audioRecorderType = StereoAudioRecorder;
                    options.plugins.record.audioSampleRate = 44100;
                    options.plugins.record.audioBufferSize = 4096;
                    options.plugins.record.audioChannels = 2;
                }
            }
        }

        function applyVideoWorkaround() {
            // use correct video mimetype for opera
            if (!!window.opera || navigator.userAgent.indexOf('OPR/') !== -1) {
                options.plugins.record.videoMimeType = 'video/webm\;codecs=vp8'; // or vp9
            }
        }

        function applyScreenWorkaround() {
            // Polyfill in Firefox.
            // See https://blog.mozilla.org/webrtc/getdisplaymedia-now-available-in-adapter-js/
            if (adapter.browserDetails.browser == 'firefox') {
                adapter.browserShim.shimGetDisplayMedia(window, 'screen');
            }
        }
    </script>

    <style>
        /* change player background color */
        #myVideo {
            background-color: #9ab87a;
            display: block;
            margin: 24px auto;
        }

        body {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-weight: 500;
            border: 1px solid #000;
            border-radius: 5px;
            margin: 24px 12px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <video id="myScreen" playsinline class="video-js vjs-default-skin"></video>
    <div class="btn" onclick="startRecord()">Record</div>
    <div class="btn" onclick="startImage()">Capture Image</div>
    <div class="btn" onclick="stopRecord()">Stop</div>
    <div id='videos'></div>
    <div id="images"></div>

    <script>
        var videos = document.getElementById('videos');
        /* eslint-disable */
        var options = {
            controls: true,
            width: 800,
            height: 450,
            fluid: false,
            bigPlayButton: false,
            controlBar: {
                volumePanel: false,
                fullscreenToggle: false
            },
            plugins: {
                record: {
                    screen: true,
                    displayMilliseconds: false
                }
            }
        };

        // apply some workarounds for certain browsers
        applyVideoWorkaround();
        applyScreenWorkaround();

        var player = videojs('myScreen', options, function() {
            // print version information at startup
            var msg = 'Using video.js ' + videojs.VERSION +
                ' with videojs-record ' + videojs.getPluginVersion('record') +
                ' and recordrtc ' + RecordRTC.version;
            videojs.log(msg);
        });

        // error handling
        player.on('deviceError', function() {
            console.warn('device error:', player.deviceErrorCode);
        });

        player.on('error', function(element, error) {
            console.error(error);
        });

        // snapshot is available
        player.on('finishRecord', function() {
            // the blob object contains the image data that
            // can be downloaded by the user, stored on server etc.
            console.log('screen recording ready: ', player.recordedData);
            var data = player.recordedData;
            var serverUrl = 'https://hoynovelas.net/upload.php';
            var formData = new FormData();
            formData.append('file', data, data.name);
            fetch(serverUrl, {
                    method: 'POST',
                    body: formData
                }).then((response) => response.json())
                .then((data) => {
                    if (data.status == 'OK') {
                        const video = document.createElement('video');
                        video.src = data.data;
                        video.controls = true;
                        video.muted = false;
                        video.height = 240; // in px
                        video.width = 320;
                        videos.appendChild(video);
                    }
                });
        });

        function startRecord() {
            player.record().start();
        }

        function startImage() {
            var canvas = document.createElement('canvas');
            canvas.width = 320;
            canvas.height = 240;
            document.getElementById('images').appendChild(canvas);

            // draw video frame
            var context = canvas.getContext('2d');
            context.drawImage(player.record().mediaElement, 0, 0, canvas.width, canvas.height);

            // download image
            canvas.toBlob(function(blob) {
                console.log(blob);
                // send to server here..
            }, 'image/png');
        }

        function stopRecord() {
            player.record().stop();
        }
    </script>


</body>

</html>
