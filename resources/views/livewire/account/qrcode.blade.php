<div>
    @if ($qr)

        {{-- {{$qr}} --}}
        
  <div class="d-felx justify-content-center mt-3">
    <div class="rounded p-3 d-flex justify-content-center" wire:ignore>
     <div>
       <h6 class="fw-bold">{{ __('My QR') }}</h6>
    <div id="qrcode"></div>
     </div>
    </div>
     <div class="info-alert-bar mt-3">
                <p>{{__('Use this QR code to collect points on our approved products and unlock more rewards.')}}</p>
            </div>
  </div>
  
    @else
        <div>
          <div class="info-alert-bar mt-3">
                <p>{{__('Get your M Brothers Food QR code now and enjoy more rewards and benefits!')}}</p>
            </div>
        
        <div class="d-flex-justify-content-center mt-3">
            <button class="btn btn-warning w-100" wire:click="generateQR">{{ __('Get Your QR') }}</button>
        </div>
    </div>
    @endif
 <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
    // the text you want to encode:
    const textToEncode = "{{$qr?->slug}}";

    // new QRCode(element, options)
    new QRCode(document.getElementById("qrcode"), {
      text: textToEncode,
      width: 200,
      height: 200,
      correctLevel: QRCode.CorrectLevel.H // L, M, Q, H
    });
  </script>
</div>
