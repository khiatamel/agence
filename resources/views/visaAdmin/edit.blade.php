<form action="{{ route('admin.reservation.update', $personne->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Nom complet -->
    <div class="form-group">
        <label for="nom">Nom complet:</label>
        <input type="text" name="nom" id="nom" value="{{ $personne->nom }}" class="form-control">
    </div>

    <!-- Prix -->
    <div class="form-group">
        <label for="prix">Prix:</label>
        <input type="text" name="prix" id="prix" value="{{ $personne->prix }}" class="form-control">
    </div>

    <!-- Status -->
    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="En attente" {{ $personne->status == 'En attente' ? 'selected' : '' }}>En attente</option>
            <option value="Approuvé" {{ $personne->status == 'Approuvé' ? 'selected' : '' }}>Approuvé</option>
            <option value="Rejeté" {{ $personne->status == 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
