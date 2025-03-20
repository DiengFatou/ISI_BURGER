<script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".delete-food").forEach(button => {
             button.addEventListener("click", function(event) {
                console.log("Bouton cliqué !");
                if (!confirm("Êtes-vous sûr de vouloir supprimer ce plat ?")) {
                    event.preventDefault(); // Annule la suppression si l'utilisateur refuse
                    console.log("Suppression annulée");
                } else {
                    console.log("Suppression confirmée, redirection vers " + this.dataset.url);
                    window.location.href = this.dataset.url; // Redirection manuelle
                }
            });
        });
         });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Récupérer les données des commandes par mois
        fetch('/statistiques/commandes-par-mois')
            .then(response => response.json())
            .then(data => {
                const mois = data.map(item => item.mois);
                const commandes = data.map(item => item.total);

                // Graphique à barres 1 : Commandes par mois
                var ctx1 = document.getElementById('barChartExample1').getContext('2d');
                var barChartExample1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: mois,
                        datasets: [{
                            label: 'Commandes par mois',
                            data: commandes,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });

        // Récupérer les données des recettes journalières
        fetch('/statistiques/recettes-journalières')
            .then(response => response.json())
            .then(data => {
                const dates = data.map(item => item.date);
                const recettes = data.map(item => item.total);

                // Graphique linéaire : Recettes journalières
                var ctx3 = document.getElementById('lineCahrt').getContext('2d');
                var lineCahrt = new Chart(ctx3, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [{
                            label: 'Recettes journalières',
                            data: recettes,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
