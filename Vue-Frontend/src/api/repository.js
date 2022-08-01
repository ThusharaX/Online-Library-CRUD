import api from "./api";

const backendUrl = "http://localhost:8000";

export default {
  createSession() {
    return api.get(`${backendUrl}/sanctum/csrf-cookie`);
  },

  login(params) {
    const email = params.email;
    const password = params.password;
    return api.post(`${backendUrl}/api/auth/login`, {
      email,
      password,
    });
  },

  register(params) {
    const name = params.name;
    const email = params.email;
    const password = params.password;
    const password_confirmation = params.password_confirmation;
    return api.post(`${backendUrl}/api/auth/register`, {
      name,
      email,
      password,
      password_confirmation,
    });
  },

  logout() {
    return api.post(`${backendUrl}/api/auth/logout`);
  },

  getBooks(page, limit) {
    return api.get(`${backendUrl}/api/books?page=${page}&limit=${limit}`);
  },

  addBook(params) {
    const title = params.title;
    const description = params.description;
    const genre = params.genre;
    const price = params.price;

    return api.post(`${backendUrl}/api/books`, {
      title,
      description,
      genre,
      price,
    });
  },

  getBook(id) {
    return api.get(`${backendUrl}/api/books/` + id);
  },

  updateBook(params) {
    const id = params.id;
    const title = params.title;
    const description = params.description;
    const genre = params.genre;
    const price = params.price;

    return api.put(`${backendUrl}/api/books/` + id, {
      title,
      description,
      genre,
      price,
    });
  },

  deleteBook(id) {
    return api.delete(`${backendUrl}/api/books/` + id);
  },

  borrowBook(id) {
    return api.put(`${backendUrl}/api/books/borrow/` + id);
  },

  returnBook(id) {
    return api.put(`${backendUrl}/api/books/return/` + id);
  },

  searchBooks(property, value) {
    return api.get(`${backendUrl}/api/books/search/${property}/${value}`);
  },

  setToken(token) {
    localStorage.setItem("token", token);
  },

  removeToken() {
    localStorage.removeItem("token");
  },

  isAuthenticated() {
    if (localStorage.getItem("token")) {
      return true;
    }
    return false;
  },
};
