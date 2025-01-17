<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Composant Tab avec Tailwind CSS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

  <div class="w-full max-w-md p-4 bg-white rounded-lg shadow-md">
    <div class="border-b border-gray-200">
      <nav class="flex" id="tabs">
        <button class="tab-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 focus:outline-none border-b-2 border-transparent active-tab">
          Onglet 1
        </button>
        <button class="tab-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 focus:outline-none border-b-2 border-transparent">
          Onglet 2
        </button>
        <button class="tab-btn px-4 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 focus:outline-none border-b-2 border-transparent">
          Onglet 3
        </button>
      </nav>
    </div>
    <div class="p-4">
      <div class="tab-content block">Contenu de l'onglet 1</div>
      <div class="tab-content hidden">Contenu de l'onglet 2</div>
      <div class="tab-content hidden">Contenu de l'onglet 3</div>
    </div>
  </div>

  <script>
    // Sélection des boutons et contenus
const tabButtons = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-content');

// Fonction pour activer un onglet
function activateTab(index) {
  tabButtons.forEach((btn, i) => {
    if (i === index) {
      btn.classList.add('text-blue-600', 'border-blue-600');
      btn.classList.remove('text-gray-600');
      tabContents[i].classList.remove('hidden');
    } else {
      btn.classList.remove('text-blue-600', 'border-blue-600');
      btn.classList.add('text-gray-600');
      tabContents[i].classList.add('hidden');
    }
  });
}

// Ajouter les événements aux boutons
tabButtons.forEach((btn, index) => {
  btn.addEventListener('click', () => activateTab(index));
});

// Activer le premier onglet par défaut
activateTab(0);

  </script>
</body>
</html>
