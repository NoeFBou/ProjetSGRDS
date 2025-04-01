function open_filter_semester() {
    document.getElementById("filter_semester").classList.toggle("hidden");
}

function open_filter_ressource() {
document.getElementById("filter_ressource").classList.toggle("hidden");
}


document.addEventListener('DOMContentLoaded', (event) => {
 
    let tableau = document.getElementById("tableauRattrapage");
    let checkboxes = document.querySelectorAll("#filter_semester input[type='checkbox']");

    // Ajoutez un gestionnaire d'événements 'change' à chaque case à cocher
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Récupèrez toutes les cases qui sont cochés
            let checked = document.querySelectorAll("#filter_semester input[type='checkbox']:checked");
            // Si aucune case n'est cochée, affichez toutes les lignes
            if (checked.length === 0) 
            {
                for (let i = 0; i < tableau.rows.length; i++) 
                {
                    tableau.rows[i].style.display = "table-row";
                }
            }
            if (checked) 
            {
                for (let i = 0; i < tableau.rows.length; i++) 
                {
                    let semestre = tableau.rows[i].cells[2].innerHTML;
                    checked.forEach(function(check) {
                        tableau.rows[i].style.display = "none";
                    });
                    checked.forEach(function(check) {
                        if (check.value == semestre) 
                        {
                            tableau.rows[i].style.display = "table-row";
                        } 
                        
                    });
                } 
            }
        });
    });

    let checkboxesressource = document.querySelectorAll("#filter_ressource input[type='checkbox']");

    // Ajoutez un gestionnaire d'événements 'change' à chaque case à cocher
    checkboxesressource.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Récupèrez toutes les cases qui sont cochés
            let checked = document.querySelectorAll("#filter_ressource input[type='checkbox']:checked");
            // Si aucune case n'est cochée, affichez toutes les lignes
            if (checked.length === 0) 
            {
                for (let i = 0; i < tableau.rows.length; i++) 
                {
                    tableau.rows[i].style.display = "table-row";
                }
            }
            if (checked) 
            {
                for (let i = 0; i < tableau.rows.length; i++) 
                {
                    let ressource = tableau.rows[i].cells[1].innerHTML;
                    checked.forEach(function(check) {
                        tableau.rows[i].style.display = "none";
                    });
                    checked.forEach(function(check) {
                        if (check.value == ressource) 
                        {
                            tableau.rows[i].style.display = "table-row";
                        } 
                        
                    });
                } 
            }
        });
    });

});



function ressource_by_semester(){
    console.log("udhoighiohxd");
    fetch("/filtre/ressources", {
        method:'POST',
        header : { 'Content-Type':'application/json',},
        body: JSON.stringify({test:'test1'})
    }).then((res) => {
        console.log(res);
    }).catch(console.log);
}
