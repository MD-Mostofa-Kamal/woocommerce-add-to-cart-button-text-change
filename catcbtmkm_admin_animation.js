
                document.addEventListener('DOMContentLoaded', function() {
                    var selectBox = document.getElementById('catcbtmkm_woo_button_icon');
                    var previewImage = document.getElementById('catcbtmkm_woo_icon_preview');

                    // Function to update the preview image
                    function updatePreview() {
                        var selectedOption = selectBox.options[selectBox.selectedIndex];
                        var imgSrc = selectedOption.getAttribute('data-img-src');
                        if (imgSrc) {
                            previewImage.src = imgSrc;
                            previewImage.style.display = 'block';
                        } else {
                            previewImage.style.display = 'none';
                        }
                    }

                    // Initial check on page load
                    updatePreview();

                    // Add event listener for select box change
                    selectBox.addEventListener('change', updatePreview);
                });



                document.addEventListener('DOMContentLoaded', function() {
                    var checkbox = document.getElementById('catcbtmkm_checkbox_endis');
                    var selects = [
                        document.getElementById('catcbtmkm_single_product'),
                        document.getElementById('catcbtmkm_archive_product'),
                        document.getElementById('catcbtmkm_woo_icon_position'),
                        document.getElementById('catcbtmkm_woo_button_icon'),
                        document.getElementById('catcbtmkm_woo_button_color'),
                        document.getElementById('catcbtmkm_woo_button_background'),
                        document.getElementById('catcbtmkm_woo_button_border_radius')
                    ];            
                    function toggleElements() {
                        var isEnabled = checkbox.checked;
            
                        selects.forEach(function(select) {
                            if (select) {
                                select.disabled = !isEnabled;
                            }
                        });
                        
                    
                    }
            
                    // Initial check
                    toggleElements();
            
                    // Listen for changes
                    checkbox.addEventListener('change', toggleElements);
                });

                

                jQuery(document).ready(function($){
                    // Function to toggle opacity based on checkbox state
                    function toggleOpacity() {
                        var opacityValue = $('#catcbtmkm_checkbox_endis').prop('checked') ? 1 : 0.4;
                        $('td#catcbtmkm_woo_button_color_admin_opacity').css('opacity', opacityValue);
                    }
                
                    // Toggle opacity on page load
                    toggleOpacity();
                
                    // Bind change event to checkbox
                    $('#catcbtmkm_checkbox_endis').change(function() {
                        // Toggle opacity when checkbox state changes
                        toggleOpacity();
                    });
                });
                


