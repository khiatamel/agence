<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
      
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/rsVisa.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />

  </head>
  <body>
  
  <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<input type="hidden" name="demande_visa_id" value="{{ $demandeVisa->id }}">

@if($dossiers->isEmpty())
        <p>Aucun dossier disponible pour le type de visa sélectionné.</p>
    @else
        @for($i = 1; $i <= $totalPersonnes; $i++)
            <div class="container max-w-lg">
                <h3 class="form-title">Personne {{ $i }}</h3>
                 <div>
                    <label class="block mb-2 text-lg font-medium text-white dark:text-white" for="nom_{{ $i }}">Nom complet :</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           type="text"
                           name="noms[{{ $i }}]" 
                           id="nom_{{ $i }}" required>
                </div>
                @foreach($dossiers as $dossier)
                    <div>
                        <label class="block mb-2 text-lg font-medium text-white dark:text-white" for="fichier_{{ $i }}_{{ $dossier->id }}">
                            {{ $dossier->dossier }} :
                        </label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                               type="file" 
                               name="fichiers[{{ $i }}][{{ $dossier->id }}]" 
                               id="fichier_{{ $i }}_{{ $dossier->id }}" required>
                    </div>
                @endforeach
            </div>
        @endfor
    @endif
    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Enregistrer la réservation</button>
</form>



    
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  </body>
</html>