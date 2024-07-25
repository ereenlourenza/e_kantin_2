document.addEventListener('DOMContentLoaded', function () {
    var textarea = document.getElementById('pesanTextarea');
    var wordCount = document.getElementById('wordCount');
  
    textarea.addEventListener('input', function () {
      var words = textarea.value.trim().split(/\s+/).filter(Boolean).length;
      wordCount.textContent = words + '/100 kata';
  
      if (words > 100) {
        textarea.value = textarea.value.trim().split(/\s+/).slice(0, 100).join(' ');
        wordCount.textContent = '100/100 kata';
      }
    });
  });