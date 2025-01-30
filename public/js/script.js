const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        const nextButtons = document.querySelectorAll('.next-step');
        const prevButtons = document.querySelectorAll('.prev-step');

        let currentTab = 0;

        function showTab(index) {
            tabContents.forEach((content, i) => {
                content.classList.toggle('hidden', i !== index);
                tabButtons[i].classList.toggle('active-tab', i === index);
            });
        }

        nextButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (currentTab < tabContents.length - 1) {
                    currentTab++;
                    showTab(currentTab);
                }
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener('click', () => {
                if (currentTab > 0) {
                    currentTab--;
                    showTab(currentTab);
                }
            });
        });

        tabButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                currentTab = index;
                showTab(currentTab);
            });
        });

        showTab(currentTab);

        /*
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
*/
        // Mise à jour des champs de texte en temps réel
        
        function updatePreview(previewId, value) {
            document.getElementById(previewId).textContent = value || ' ';
        }
/*
        // Prévisualisation de la photo de profil
      
        function previewPhoto(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profilePhotoTemplate');
                output.src = reader.result;
                document.getElementById('profilePhotoPreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
*/

        function previewPhoto(event) {
            const fileInput = event.target; // L'élément input type="file"
            const reader = new FileReader(); // Crée une instance de FileReader

            reader.onload = function () {
                const profilePhotoPreview = document.getElementById('profilePhotoTemplate'); // Image d'aperçu
                const avatarInitial = document.getElementById('avatar-initial'); // Conteneur de l'initiale

                // Met à jour l'aperçu de l'image
                profilePhotoPreview.src = reader.result;
                profilePhotoPreview.classList.remove('hidden'); // Affiche l'image
                avatarInitial.classList.add('hidden'); // Masque l'initiale
            };

            // Vérifiez si un fichier est sélectionné
            if (fileInput.files && fileInput.files[0]) {
                reader.readAsDataURL(fileInput.files[0]); // Charge l'image
            }
        }

        /*function showSocialInput(platform) {
            const socialInputs = document.getElementById('socialInputs');

            // Vérifiez si un champ pour cette plateforme existe déjà
            if (document.getElementById(`input-${platform}`)) return;

            const inputWrapper = document.createElement('div');
            inputWrapper.id = `input-${platform}`;
            inputWrapper.className = 'flex items-center gap-2';

            inputWrapper.innerHTML = `
        <img src="{{asset('img/social_links/${getIconPath(platform)}') }}" alt="${platform}" class="w-8 h-8 mt-3">
        <input type="url" name="${platform}" placeholder="Enter ${platform} URL"
            class="block w-full mt-3 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring"
            oninput="updateSocialLink('${platform}', this.value)">
        <button onclick="removeSocialInput('${platform}')" class="text-red-500 mt-3">Remove</button>
    `;

            socialInputs.appendChild(inputWrapper);
        }

        /*
        function updateSocialLink(platform, value) {
            const iconLink = document.querySelector(`#preview-${platform}`);
            if (iconLink) {
                iconLink.href = value || "#"; // Mettre à jour le lien ou définir un lien vide par défaut
            }
        }
        */

        function showSocialInput(platform) {
            const socialInputs = document.getElementById('socialInputs');
        
            // Vérifiez si un champ pour cette plateforme existe déjà
            if (document.getElementById(`input-${platform}`)) return;
        
            const inputWrapper = document.createElement('div');
            inputWrapper.id = `input-${platform}`;
            inputWrapper.className = 'flex items-center gap-2 mb-4';
        
            // Ajoutez le chemin de l'icône
            const iconPath = getIconPath(platform);
        
            inputWrapper.innerHTML = `
                <img src="${iconPath}" alt="${platform}" class="w-8 h-8 mt-3">
                <input type="url" name="${platform}" placeholder="Enter ${platform} URL"
                    class="block w-full mt-3 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring"
                    oninput="updateSocialLink('${platform}', this.value)">
                <button onclick="removeSocialInput('${platform}')" class="text-red-500 mt-3">Remove</button>
            `;
        
            socialInputs.appendChild(inputWrapper);
        }
        
        // Update the preview section dynamically
        function updateSocialLink(platform, url) {
            const previewSection = document.getElementById(`preview-${platform}`);

            if (!previewSection) {
                // Create the icon in the preview if it doesn't exist
                const previewContainer = document.getElementById('social-preview');
                const iconWrapper = document.createElement('li');
                iconWrapper.id = `preview-${platform}`;
                iconWrapper.className = 'flex flex-col items-center justify-around';

                const iconPath = getIconPath(platform);

                iconWrapper.innerHTML = `
                    <a href="${url}" target="_blank">
                        <img src="${iconPath}" alt="${platform}" class="w-10 h-10">
                    </a>
                `;
                previewContainer.appendChild(iconWrapper);
            } else {
                // Update the URL of the existing icon
                const link = previewSection.querySelector('a');
                link.href = url;
            }
}


        function removeSocialInput(platform) {
            const inputWrapper = document.getElementById(`input-${platform}`);
            if (inputWrapper) {
                inputWrapper.remove();
                // Réinitialiser le lien d'aperçu
                const iconLink = document.querySelector(`#preview-${platform}`);
                if (iconLink) {
                    iconLink.href = "#";
                }
            }

        }

        
        


        document.addEventListener('DOMContentLoaded', () => {
            // Fonction pour changer la couleur de fond du profil
            function updateBackgroundColor(event) {
                const color = event.target.value; // Récupérer la valeur de la couleur saisie
                const profileContainer = document.getElementById('profileTemplate');
                if (profileContainer) {
                    profileContainer.style.backgroundColor = color; // Appliquer la couleur en arrière-plan
                }
            }

            // Ajout d'un écouteur d'événement à l'input de couleur
            const colorInput = document.getElementById('backgroundColorInput');
            if (colorInput) {
                colorInput.addEventListener('input', updateBackgroundColor); // Réagir en temps réel aux changements
            }
        });

        //lien copied
        function copyToClipboard() {
            const linkInput = document.getElementById('profile-link');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999);
            document.execCommand('copy');
            const notification = document.getElementById('copy-notification');
            notification.classList.remove('hidden');
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 2000);
        }

        function downloadQRCode(format) {
            const img = document.getElementById('qr-code');
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            // Charge l'image
            const image = new Image();
            image.crossOrigin = "anonymous"; // Si le SVG est sur un autre domaine
            image.onload = () => {
                // Définir les dimensions du canvas
                canvas.width = image.naturalWidth;
                canvas.height = image.naturalHeight;

                // Dessiner l'image sur le canvas
                ctx.drawImage(image, 0, 0);

                // Exporter le canvas au format demandé
                const mimeType = format === 'jpg' ? 'image/jpeg' : 'image/png';
                const dataURL = canvas.toDataURL(mimeType);

                // Créer un lien de téléchargement
                const link = document.createElement('a');
                link.href = dataURL;
                link.download = `qr-code.${format}`;
                link.click();
            };
            image.src = img.src;
        }

        function downloadAsPDF() {
            const img = document.getElementById('qr-code');
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');

            const image = new Image();
            image.crossOrigin = "anonymous"; // Si le SVG est sur un autre domaine
            image.onload = () => {
                canvas.width = image.naturalWidth;
                canvas.height = image.naturalHeight;
                ctx.drawImage(image, 0, 0);

                // Charger jsPDF correctement
                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'px',
                    format: [canvas.width, canvas.height]
                });

                pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save('qr-code.pdf');
            };
            image.src = img.src;
        }