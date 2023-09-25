<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>The AR Journey</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://aframe.io/releases/0.8.0/aframe.min.js"></script>
    <!-- we import arjs version without NFT but with marker + location based support -->
    <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.6.0/aframe/build/aframe-ar.js"></script>
    <script>
        AFRAME.registerComponent("mylink", {
            init: function() {
                this.el.addEventListener("click", (e) => {
                    window.location = this.data.href;
                })
            }
        })
    </script>

</head>

<body style='margin : 0px; overflow: hidden;'>
<a-scene cursor="rayOrigin: mouse" embedded arjs='trackingMethod: best;'>
    <a-assets>
        <img id="redeem" src="assets/reedem.png">
    </a-assets>
    <a-marker preset="hiro">
        <a-plane position="0 0 0.8" color="transparent" opacity="0" width="2" height="0.3" rotation="-90 0 0">
            <a-entity
                position="0 0 0"
                scale="0.05 0.05 0.05"
                gltf-model="https://raw.githack.com/AR-js-org/AR.js/master/aframe/examples/image-tracking/nft/trex/scene.gltf">
                <a-animation attribute="rotation" dur="7000" to="0 360 0" easing="linear" repeat="indefinite"></a-animation>
            </a-entity>
            <a-image src="assets/reedem.png" width="2" height="0.5" mylink="href: https://pama.evorty.id/redeem/booth-1;" position="0 -0.5 0"
                     rotation="0 0 0"></a-image>
    </a-marker>
    <a-entity camera></a-entity>
</a-scene>

<!-- Modal Hint -->
<div class="modal fade" id="modal-hint" tabindex="-1" aria-labelledby="modal-hint" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content card-leaderboard card-body overflow-visible modal-leaderboard">
            {{-- acc --}}
            <div class="w-100 d-flex justify-content-between mb-3">
                <img src="{{ asset('assets/img/leaderboard/hiasanpojokbg.png') }}" alt="" width="24px">
                <img src="{{ asset('assets/img/leaderboard/hiasanpojokbg.png') }}" alt="" width="24px">
            </div>
            {{-- hint --}}
            <div class="d-flex justify-content-center align-items-center flex-column">
                <p class="text-center text-white fw-bold fs-5">Scan gambar untuk memenangkan hadiah</p>
                <button class="btn btn-warning text-event-primary fw-bold rounded-pill" data-bs-dismiss="modal"><span class="px-5">Ok</span></button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script>
    $(document).ready(function() {
        let modalHint = new bootstrap.Modal(document.getElementById('modal-hint'), {
            keyboard: false
        })

        modalHint.show();
    })
</script>
</body>
</html>
