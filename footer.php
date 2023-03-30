<script src="assets/js/index.js"></script>
<script type="text/javascript">
    function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
function onScanSuccess(qrCodeMessage) {
    openForm();
    document.getElementById('product-id').value = qrCodeMessage;
}

function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 120, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
</body>
</html> 