document.querySelectorAll('.omra-row').forEach(row => {
    row.addEventListener('click', function() {
        const omraId = this.getAttribute('data-id');

        fetch(`/reservations/omra/${omraId}`)
            .then(response => response.json())
            .then(data => {
                // Effacer les anciennes réservations
                const tbody = document.querySelector('#customers_table tbody');
                tbody.innerHTML = '';

                // Ajouter les nouvelles réservations
                data.reservations.forEach(reservation => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${reservation.nom}</td>
                            <td>${reservation.numero}</td>
                            <td><a href="/storage/${reservation.passeport}" target="_blank">Voir le Passeport</a></td>
                            <td><a href="/storage/${reservation.photo}" target="_blank">Voir la Photo</a></td>
                            <td>${reservation.hotel}</td>
                            <td>${reservation.age}</td>
                            <td>${reservation.group_name}</td>
                            <td style="color: ${reservation.statut === 'accepté' ? 'green' : reservation.statut === 'refusé' ? 'red' : 'blue'};">
                                ${reservation.statut}
                            </td>
                            <td>
                                <a href="/dash/accept/${reservation.id}" class="icon-btn-A" title="Accepter">
                                    <i class="fas fa-check-circle text-success"></i>
                                </a>
                                <a href="/dash/refuse/${reservation.id}" class="icon-btn-R" title="Refuser">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </a>
                            </td>
                        </tr>`;
                });
            });
    });
});
