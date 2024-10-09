<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/commission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <title>Sanhadja Voyage</title>
</head>
<body>

<div class="container">
    <h2>Gestion des commissions pour l'Omra: <strong>{{ $omra->nom }}</strong></h2>
    
    <!-- Formulaire pour ajouter une nouvelle commission -->
    <form action="{{ route('commissions.store') }}" method="POST" class="mt-4 form">
        @csrf
        <div class="form-group">
            <label for="condition">Condition</label>
            <input type="text" name="condition" class="form-control" placeholder="Ex: Groupe de 5 personnes" required>
        </div>

        <div class="form-group mt-3">
            <label for="prix">Prix (DZD)</label>
            <input type="text" name="prix" class="form-control" placeholder="Ex: 10000" required>
        </div>

        <input type="hidden" name="omra_id" value="{{ $omra->id }}">

        <button type="submit" class="btn btn-success mt-3">Ajouter la commission</button>
    </form>

    <!-- Liste des commissions existantes -->
    <h3 class="mt-5">Commissions existantes pour cette Omra</h3>
    @if($commissions->count() > 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Condition</th>
                    <th>Prix (DZD)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($commissions as $commission)
            <tr>
                <td>{{ $commission->condition }}</td>
                <td>{{ $commission->prix }}</td>
                <td>
                    <!-- Bouton pour afficher le formulaire d'édition -->
                    <button class="btn btn-warning" onclick="showEditForm('{{ $commission->id }}', '{{ $commission->prix }}', '{{ $commission->condition }}')">Modifier</button>

                    <!-- Bouton de suppression -->
                    <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune commission pour cette Omra.</p>
    @endif

    <!-- Formulaire de Mise à Jour -->
    <!-- Remplacement de l'ID pour éviter les conflits -->
    <div id="updateFormContainer" style="display: none;">
        <h3>Modifier la Commission</h3>
        <form method="POST" action="{{ route('commissions.update', ['commission' => ':id']) }}" id="updateForm" class="form">
            @csrf
            @method('PUT')
            
            <!-- ID caché de la Commission -->
            <input type="hidden" id="commission_id" name="commission_id">

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="condition">Condition</label>
                <input type="text" id="condition" name="condition" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success">Sauvegarder</button>
        </form>
    </div>

</div>

<script defer>
  function showEditForm(commissionId, prix, condition) {
      // Pré-remplir le formulaire avec les valeurs actuelles
      document.getElementById('commission_id').value = commissionId;
      document.getElementById('prix').value = prix;
      document.getElementById('condition').value = condition;

      // Mettre à jour l'action du formulaire pour la route correcte
      let form = document.getElementById('updateForm');
      form.action = form.action.replace(':id', commissionId);

      // Afficher le formulaire
      document.getElementById('updateFormContainer').style.display = 'block';
  }
</script>

<script src="{{ asset('js/search.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{ asset('js/dash.js') }}"></script>
</body>
</html>
