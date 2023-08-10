<table class="table table-bordered" style="table-layout: fixed;">
    <tbody>
        <tr>
        @foreach ($recipeAttrInputTypes as $attr => $inputType)
        @php
            $oldVal = !empty($$attr) ? $$attr : '';
            if (is_array($oldVal)) {
                $oldVal = implode(',', $oldVal);
            }
        @endphp
        <td>
            <x-input-types
                name="{{ $attr }}"
                type="{{ $inputType }}"
                label="{{ $recipeAttrNames[$attr] }}"
                value="{{ $oldVal }}"
                :options="!empty($recipeOptions[$attr]) ? $recipeOptions[$attr] : []"
                :multi="!empty($multi[$attr]) ? $multi[$attr] : false"
                :multiLines="true"
                ></x-input-types>
            @if ($errors->has($attr))
                <div class="text-danger">{{ $errors->first($attr) }}</div>
            @endif
        </td>
        @endforeach
        <td style="vertical-align: middle; width: 40px; padding: 0"><button class="btn text-center btn-delete" type="button"><span class="fa fa-trash"></span></button></td>
        </tr>
    </tbody>
</table>
