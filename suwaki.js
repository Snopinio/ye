function updatePriceDisplay() {
    // Get the slider elements
    const minPriceSlider = document.getElementById("min-price");
    const maxPriceSlider = document.getElementById("max-price");

    // Get the display elements
    const minPriceDisplay = document.getElementById("min-price-display");
    const maxPriceDisplay = document.getElementById("max-price-display");

    // Update the display with the current slider values
    minPriceDisplay.textContent = parseFloat(minPriceSlider.value).toFixed(2);
    maxPriceDisplay.textContent = parseFloat(maxPriceSlider.value).toFixed(2);
}

// Reset filters function to return sliders to their initial values
function resetFilters() {
    const minPriceSlider = document.getElementById("min-price");
    const maxPriceSlider = document.getElementById("max-price");

    // Set default values
    minPriceSlider.value = 1.00;
    maxPriceSlider.value = 9.99;

    // Update the display
    updatePriceDisplay();
}