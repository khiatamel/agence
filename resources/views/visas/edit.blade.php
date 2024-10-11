<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/visaa.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Sanhadja Voyage</title>
</head>
<body>
    <div class="topbar">
    		<div class="toggle">
             <a href="{{ route('visas.index') }}"><ion-icon name="arrow-back-outline"></ion-icon></a>
    		</div>
    
    		<div class="user">
                <li class="navbar-item">
                    Admin : {{ Auth::user()->name }}     
                </li>
          </div>
    </div>
<div class="container block max-w-screen-md">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1>Modifier le Visa: {{ $visa->destination }}</h1>

    <form action="{{ route('visas.update', $visa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Destination du Visa -->
        <div>
            <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" value="{{ $visa->destination }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>

        <hr>

        <!-- Types de Visa -->
        <h3 class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Types de Visa</h3>
        <div id="typeVisasContainer" class="visa">
            @foreach($visa->typeVisas as $index => $typeVisa)
                <div class="typeVisa" >
                    <label for="types[{{ $index }}][type]">Type de Visa:</label>
                    <input type="text" name="types[{{ $index }}][type]" value="{{ $typeVisa->type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

                    <h4 class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Dossiers pour ce type</h4>
                    <div class="dossiersContainer">
                        @foreach($typeVisa->dossierVisas as $dossierIndex => $dossierVisa)
                            <div class="dossier">
                                <label for="types[{{ $index }}][dossiers][{{ $dossierIndex }}]">Dossier:</label>
                                <input type="text" name="types[{{ $index }}][dossiers][{{ $dossierIndex }}]" value="{{ $dossierVisa->dossier }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bouton pour ajouter un autre dossier -->
                    <button type="button" class="addDossierButton relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">Ajouter un autre dossier</button>
                </div>
            @endforeach
        </div>

        <!-- Bouton pour ajouter un autre type de visa -->
        <button type="button" id="addTypeVisaButton" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">Ajouter un autre type de visa</button>

        <hr>

        <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Modifier le Visa</button>
    </form>
</div>
    <script>
        let typeVisaCount = {{ count($visa->typeVisas) }};
        let dossierCount = @json($visa->typeVisas->mapWithKeys(fn($typeVisa, $index) => [$index => $typeVisa->dossierVisas->count()]));

        // Ajout de nouveaux types de visa dynamiquement
        document.getElementById('addTypeVisaButton').addEventListener('click', function() {
            let typeVisaContainer = document.createElement('div');
            typeVisaContainer.classList.add('typeVisa');

            typeVisaContainer.innerHTML = `
                <label for="types[${typeVisaCount}][type]">Type de Visa:</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="types[${typeVisaCount}][type]" required>

                <h4 class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Dossiers pour ce type</h4>
                <div class="dossiersContainer">
                    <div class="dossier">
                        <label for="types[${typeVisaCount}][dossiers][0]">Dossier:</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="types[${typeVisaCount}][dossiers][0]" required>
                    </div>
                </div>

                <button type="button" class="addDossierButton relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">Ajouter un autre dossier</button>
            `;

            dossierCount[typeVisaCount] = 1;
            document.getElementById('typeVisasContainer').appendChild(typeVisaContainer);

            typeVisaCount++;
        });

        // Ajout de nouveaux dossiers dynamiquement
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('addDossierButton')) {
                let dossiersContainer = e.target.previousElementSibling;
                let typeIndex = Array.from(dossiersContainer.parentElement.parentElement.children).indexOf(dossiersContainer.parentElement);
                let dossierIndex = dossierCount[typeIndex]++;

                let dossierContainer = document.createElement('div');
                dossierContainer.classList.add('dossier');

                dossierContainer.innerHTML = `
                    <label for="types[${typeIndex}][dossiers][${dossierIndex}]">Dossier:</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="types[${typeIndex}][dossiers][${dossierIndex}]" required>
                `;

                dossiersContainer.appendChild(dossierContainer);
            }
        });
    </script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>