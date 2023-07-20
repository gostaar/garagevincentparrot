window.onload = () => {
    const FiltersForm = document.querySelector('#filters');

    //on boucle sur les input
    document.querySelectorAll("#filters input").forEach(input => {
        input.addEventListener("change", () => {
            //inic on intercepte les clics
            //on récupère les données du formulaire
            
            const Form = new FormData(FiltersForm);

            //on frablique la queryString
            const Params = new URLSearchParams();
            
            Form.forEach((value, key) => {
                Params.append(key, value);
            })

            //On récupère l'url active
            const Url = new URL(window.location.href);
            
            //On lance la requête ajax
            fetch(Url.pathname + "?" + Params.toString() + "&ajax=1", {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response => {
                console.log(response)
                }).catch(e => alert(e));
                        
        })
    })
}