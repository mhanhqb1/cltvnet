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

    <video id="myImage" playsinline class="video-js vjs-default-skin"></video>

    <script>
        /* eslint-disable */
        var options = {
            controls: true,
            fluid: true,
            bigPlayButton: false,
            controlBar: {
                volumePanel: false,
                fullscreenToggle: false
            },
            // dimensions of the video.js player
            width: 640,
            height: 480,
            plugins: {
                record: {
                    debug: true,
                    imageOutputType: 'dataURL',
                    imageOutputFormat: 'image/png',
                    imageOutputQuality: 0.92,
                    image: {
                        // image media constraints: set resolution of camera
                        width: {
                            min: 640,
                            ideal: 640,
                            max: 1280
                        },
                        height: {
                            min: 480,
                            ideal: 480,
                            max: 920
                        }
                    },
                    // dimensions of captured video frames
                    frameWidth: 640,
                    frameHeight: 480
                }
            }
        };

        var player = videojs('myImage', options, function() {
            // print version information at startup
            var msg = 'Using video.js ' + videojs.VERSION +
                ' with videojs-record ' + videojs.getPluginVersion('record');
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
            console.log('snapshot ready: ', player.recordedData);
            player.record().saveAs({
                'image': 'my-image'
            });
        });

        player.on('retry', function() {
            console.log('retry');
        });
    </script>


</body>

</html>
