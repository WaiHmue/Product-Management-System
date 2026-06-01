</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function loadFile(event){
        let output = document.getElementById("output");


        var reader = new FileReader();
        reader.onload = function(){
            output.src = reader.result;

        }
        reader.readAsDataURL(event.target.files[0]);
        
    }
</script>
</html>
