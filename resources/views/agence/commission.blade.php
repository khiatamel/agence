<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/commission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">

    
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />

    <title>Sanhadja Voyage</title>
</head>
<body>

<div class="container block max-w-2xl">
    <!-- Toasts -->
<div id="toast-success" class=" toast hidden flex items-center w-full max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>

<div id="toast-danger" class="toast hidden flex items-center w-full max-w-xl p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>

<div id="toast-warning" class="toast hidden flex items-center w-full max-w-xl p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
        </svg>
        <span class="sr-only">Warning icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('warning') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
    <h2>Gestion des commissions pour l'Omra: <strong>{{ $omra->nom }}</strong></h2>
    
    <!-- Formulaire pour ajouter une nouvelle commission -->
    <form action="{{ route('commissions.store') }}" method="POST" class="mt-4 form">
        @csrf
        <div class="form-group">
            <label for="condition">Condition</label>
            <input type="text" name="condition" class="form-control" placeholder="Ex: غرفة خماسية" required>
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
                    <th style="text-align:center;">Action</th>
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

                    <button data-modal-target="popup-modal-{{ $omra->id }}" data-modal-toggle="popup-modal-{{ $omra->id }}" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                      Supprimer
                    </button>
        
                    <!-- Modal -->
                    <div id="popup-modal-{{ $omra->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $omra->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Voulez-vous confirmer la suppression de cette commission ?</h3>
        
                                    <a href="{{ route('omras.destroy', $omra->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $omra->id }}').submit();">
                                        <button id="confirm-delete" data-id="{{ $omra->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Confirmer
                                        </button>
                                    </a>
                                    <button data-modal-hide="popup-modal-{{ $omra->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Annuler</button>
                                    
                                    <form id="delete-form-{{ $omra->id }}" action="{{route('commissions.destroy', $commission->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <div class="return">
        <button type="button" class="btn-return" onclick="window.location.href='{{ route('omra.index') }}'">
          Retourn a la liste de Omra
        </button>
    </div>
<script defer>
  function showEditForm(commissionId, prix, condition) {
      // Pré-remplir le formulaire avec les valeurs actuelles
      document.getElementById('commission_id').value = commissionId;
      document.getElementById('prix').value = prix;
      document.getElementById('condition').value = condition;

      // Mettre à jour l'action du formulaire avec l'ID correct de la commission
      let form = document.getElementById('updateForm');
      let actionUrl = "{{ route('commissions.update', ':id') }}";
      form.action = actionUrl.replace(':id', commissionId);

      // Afficher le formulaire
      document.getElementById('updateFormContainer').style.display = 'block';
  }
</script>
<!-- Script -->
<script>
    function showToast(id) {
        const toast = document.getElementById(id);
        toast.classList.remove('hidden');
        
        // Masquer le toast après 3 secondes
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }

    @if(session('success'))
        showToast('toast-success');
    @endif

    @if(session('error'))
        showToast('toast-danger');
    @endif

    @if(session('warning'))
        showToast('toast-warning');
    @endif
</script>
<script src="{{ asset('js/search.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="{{ asset('js/dash.js') }}"></script>
</body>
</html>
