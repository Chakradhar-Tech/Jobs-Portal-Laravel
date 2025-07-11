<div {{ $attributes->merge([ 'class'=>'container w-50 mx-auto border border-light-50 rounded-4 shadow-lg bg-light mb-4 p-4']) }}>

        @if (isset($header))

        <h5 class=" text-center fw-semibold fs-3"> {{ $header }} </h5>

        @endif

{{ $slot }}
</div>
