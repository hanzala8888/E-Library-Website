function search_book() {
    let input = document.getElementById('searchbar').value.toLowerCase();
    let books = document.getElementsByClassName('book');
  
    // Hide the book list if there is no input
    if (input.length == 0) {
        document.getElementById('list').style.display = 'none';
        return;
    }
  
    for (let i = 0; i < books.length; i++) {
      let title = books[i].getElementsByTagName('a')[0].textContent.toLowerCase();
  
      if (title.includes(input)) {
        books[i].style.display = 'block';
      } else {
        books[i].style.display = 'none';
      }
    }
    
    // Show the book list after a search
    document.getElementById('list').style.display = 'block';
}