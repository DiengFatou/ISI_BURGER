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
