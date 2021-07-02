<x-app-layout>
    <div class="py-40px">
        <div class="p-15px" style="min-height: 444px;">
            <div class="mx-15px mx-auto max-w-540 sm:max-w-720 md:max-w-1140">
                <div class="container-fluid">
                    <div class="row">
                        <div class="order-md-last order-sm-last order-last map-left">
                            <div class="row">
                                @foreach($doctors as $doctor)
                                    <x-doctor.preview-card-doctor :doctor="$doctor"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
