<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>The AR Journey</title>
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
</body>
</html>
