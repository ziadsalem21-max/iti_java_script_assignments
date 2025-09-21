const library = {
    books: [
        { title: "my road to A+", author: "ziad", year: 2005 },
        { title: "1888", author: "Naser ahmed", year: 1888 },
        { title: "A Man Can Dream", author: "Khaled Mohamed", year: 2014 }
    ],

    showBooks: function () {
        document.writeln("<h2> book list </h2>");
        this.books.forEach(book => {
            document.writeln(`<h2>
            the Book title "${book.title}" and the author "${book.author}" and the book year "${book.year}"</h2><br> <br>  `);
        });
    }
};
library.showBooks();