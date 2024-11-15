// Array of Tailwind CSS color classes
const backgroundColors = [
    'bg-blue-100',
    'bg-gray-800'
    
  ];
  const textColors = ["text-blue-700", "text-gray-50"];

  // Get the body element
 // Variables to track the current index for colors
  let colorIndex = 0;

  // Get elements
  const body = document.getElementById('body');
  const headerText = document.getElementById('header-text');
  const textname = document.getElementById('textname');
  const textname1 = document.getElementById('textname1');
  const textname2 = document.getElementById('textname2');
  const textname3 = document.getElementById('textname3');

  // Load saved colors from localStorage on page load
  window.onload = function() {
    const savedBackgroundColor = localStorage.getItem('backgroundColor');
    const savedTextColor = localStorage.getItem('textColor');

    if (savedBackgroundColor && savedTextColor) {
      body.classList.add(savedBackgroundColor);
      headerText.classList.add(savedTextColor);
      textname.classList.add(savedTextColor);
      textname1.classList.add(savedTextColor);
      textname2.classList.add(savedTextColor);
      textname3.classList.add(savedTextColor);
    } else {
      // Default color if none are saved
      body.classList.add(backgroundColors[0]);
      headerText.classList.add(textColors[0]);
      textname.classList.add(textColors[0]);
      textname1.classList.add(textColors[0]);
      textname2.classList.add(textColors[0]);
      textname3.classList.add(textColors[0]);
    }
  };

  // Function to cycle both background and text colors
  function cycleColors() {
    // Remove current colors
    body.classList.remove(backgroundColors[colorIndex]);
    headerText.classList.remove(textColors[colorIndex]);
    textname.classList.remove(textColors[colorIndex]);
    textname1.classList.remove(textColors[colorIndex]);
    textname2.classList.remove(textColors[colorIndex]);
    textname3.classList.remove(textColors[colorIndex]);

    // Increment the color index (reset if it reaches the end)
    colorIndex = (colorIndex + 1) % backgroundColors.length;

    // Add the new colors
    body.classList.add(backgroundColors[colorIndex]);
    headerText.classList.add(textColors[colorIndex]);
    textname.classList.add(textColors[colorIndex]);
    textname1.classList.add(textColors[colorIndex]);
    textname2.classList.add(textColors[colorIndex]);
    textname3.classList.add(textColors[colorIndex]);

    // Save the new colors in localStorage
    localStorage.setItem('backgroundColor', backgroundColors[colorIndex]);
    localStorage.setItem('textColor', textColors[colorIndex]);
  }