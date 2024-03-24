const documentsList = document.getElementById('documents');


function displayDocuments() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'get-documents.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      const documents = JSON.parse(xhr.responseText);
      documentsList.innerHTML = '';
      for (const document of documents) {
        documentsList.innerHTML += `<div class="document">
          <a href="documents/<span class="math-inline">\{document\.fileName\}" target\="\_blank"\></span>{document.fileName}</a>
          <button onclick="deleteDocument('${document.fileName}')">Sterge</button>
        </div>`;
      }
    } else {
      console.error('Eroare la incarcarea documentelor.');
    }
  };
  xhr.send();
}


function deleteDocument(fileName) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'delete-document.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      if (xhr.responseText === 'success') {
        displayDocuments();
      } else {
        console.error('Eroare la stergerea documentului.');
      }
    } else {
      console.error('Eroare la stergerea documentului.');
    }
  };
  xhr.send('fileName=' + fileName);
