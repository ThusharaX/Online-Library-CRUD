import LoginView from "@/views/LoginView.vue";
import BooksView from "@/views/BooksView.vue";
import BookView from "@/views/BookView.vue";
import RegisterView from "@/views/RegisterView.vue";
import AddBook from "@/views/AddBook.vue";
import EditBook from "@/views/EditBook.vue";
import MyBooks from "@/views/MyBooks.vue";

import middleware from "./middleware";
import SearchResultView from "@/views/SearchResultView.vue";

export default [
  {
    path: "/",
    name: "login",
    component: LoginView,
    beforeEnter: middleware.guest,
  },
  {
    path: "/register",
    name: "register",
    component: RegisterView,
    beforeEnter: middleware.guest,
  },
  {
    path: "/logout",
    name: "logout",
    beforeEnter: middleware.user,
  },
  {
    path: "/books",
    name: "books",
    component: BooksView,
    beforeEnter: middleware.user,
  },
  {
    path: "/book/:id",
    name: "book",
    component: BookView,
    beforeEnter: middleware.user,
  },
  {
    path: "/book/add",
    name: "addBook",
    component: AddBook,
    beforeEnter: middleware.user,
  },
  {
    path: "/book/edit/:id",
    name: "editBook",
    component: EditBook,
    beforeEnter: middleware.user,
  },
  {
    path: "/my-books",
    name: "myBooks",
    component: MyBooks,
    beforeEnter: middleware.user,
  },
  {
    path: "/search/:property/:value",
    name: "search",
    component: SearchResultView,
    beforeEnter: middleware.user,
  },
];
