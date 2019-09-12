<script>
    const sjProperties = '<?php echo json_encode($jProperties); ?>'
    ajProperties = JSON.parse(sjProperties) // convert text into an object
    console.log(ajProperties)

    mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudGlhZ29kb25vc28iLCJhIjoiY2swYzVoYmNmMHlkZzNibzR4NTNxamU3cSJ9.QNJx-cfl48aSOx8purGNeA';
    var map = new mapboxgl.Map({
        container: 'map',
        center: [12.555050, 55.704001], // starting position
        zoom: 12, // starting zoom
        style: 'mapbox://styles/santiagodonoso/ck0c6jrhh02va1cnp07nfsv64'

    });
    map.addControl(new mapboxgl.NavigationControl());

    // JSON works with for in loops
    // Arrays work with forEach and also with for of
    for (let jProperty of ajProperties) { // json object with json objects in it

        var el = document.createElement('a');
        el.href = '#Right' + jProperty.id
        el.className = 'marker'
        el.style.backgroundImage = 'url(marker.png)';
        el.style.width = "50px"
        el.style.height = "50px"
        el.id = jProperty.id
        el.addEventListener('click', function() {
            console.log(`Highlight property with ID ${this.id} `);
            removeActiveClassFromProperty()
            document.getElementById(this.id).classList.add('activeProperty') // left
            document.getElementById('Right' + this.id).classList.add('activeProperty') // right
        });
        // add marker to map
        new mapboxgl.Marker(el).setLngLat(jProperty.geometry.coordinates).addTo(map);
    } // end loop

    // $('.active').removeClass('.active')
    function removeActiveClassFromProperty() {
        let properties = document.querySelectorAll('.activeProperty')
        properties.forEach(function(oPropertyDiv) {
            oPropertyDiv.classList.remove('activeProperty')
        })
    }
</script>


<script src="scripts/validate.js"></script>
<script src="scripts/login.js"></script>
<script src="scripts/signup.js"></script>
</body>
<div class="bottom">
    <h4>Tel: +45.45.45.45 -
        <b>Zillow &#9400; 2019</b> -
        CVR 45 45 45 45
    </h4>
</div>

</html>