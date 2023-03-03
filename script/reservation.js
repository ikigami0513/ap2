const url = "/ap2/vue/api/sallesDispo.php";
document.querySelector("#date").valueAsDate = new Date();

function call(){
    // Définir les données à envoyer avec la requête POST
    const postData = new FormData();
    postData.append('type', document.querySelector('#type').value);
    postData.append('date', document.querySelector('#date').value);
    postData.append('heure', document.querySelector('#heure').value);

    // Définir les options de la requête
    const options = {
        method: 'POST',
        body: postData
    };

    // Utiliser la méthode fetch() pour envoyer la requête POST
    fetch(url, options)
    .then(response => response.json())
    .then(data => {
        var salles = [];
        data.forEach(obj => {
            var salle = [];
            Object.entries(obj).forEach(([key, value]) => {
                salle.push(value);
            });
            salles.push(salle);
        });
        const select = document.querySelector("#salle_dispo");
        while(select.firstChild){
            select.removeChild(select.firstChild);
        }
        salles.forEach(element => {
            const opt = document.createElement("option");
            opt.value = element[0];
            opt.text = element[1];
            select.append(opt, null);
        })
    })
    .catch(error => console.log(error));
}

document.querySelector("#type").addEventListener('change', (event) => call());
document.querySelector("#date").addEventListener('change', (event) => call());
document.querySelector("#heure").addEventListener('change', (event) => call());