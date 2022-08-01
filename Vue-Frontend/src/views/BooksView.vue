<template>
  <div class="home">
    <h1 class="text-3xl font-bold mt-5 mb-5 text-center">Books</h1>

    <!-- pagination -->
    <div class="flex justify-center items-center space-x-1">
      <!-- limit dropdown loop data.total -->
      <div class="flex justify-center">
        <p class="p-2">Books per page :</p>
        <select class="w-half p-2 mr-5" v-model="limit">
          <option v-for="n in data.total" :key="n">{{ n }}</option>
        </select>
      </div>

      <div v-if="data.current_page != 1">
        <button
          class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"
          @click="page = 1"
        >
          First
        </button>
      </div>

      <button
        class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"
        @click="page--"
        v-if="data.current_page > 1"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M11 17l-5-5m0 0l5-5m-5 5h12"
          />
        </svg>
      </button>

      <div
        class="flex justify-around flex-row"
        v-for="n in data.last_page"
        :key="n"
      >
        <div
          v-if="
            n == data.current_page - 1 ||
            n == data.current_page ||
            n == data.current_page + 1
          "
        >
          <button
            v-if="n == data.current_page"
            class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-400 hover:text-white"
            @click="page = n"
          >
            {{ n }}
          </button>
          <button
            v-else
            class="px-4 py-2 text-gray-500 bg-gray-300 rounded-md hover:bg-gray-200 hover:text-gray-700"
            @click="page = n"
          >
            {{ n }}
          </button>
        </div>
      </div>

      <button
        class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"
        @click="page++"
        v-if="data.current_page < data.last_page"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13 7l5 5m0 0l-5 5m5-5H6"
          />
        </svg>
      </button>

      <div v-if="data.current_page != data.last_page">
        <button
          class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"
          @click="page = data.last_page"
        >
          Last
        </button>
      </div>
    </div>

    <!-- Search books -->
    <div class="flex justify-center mt-5 space-x-5">
      <!-- Search by -->
      <select class="w-half p-2 mb-5" v-model="property">
        <option value="title">Title</option>
        <option value="description">Description</option>
        <option value="genre">Genre</option>
      </select>

      <input
        class="w-100 p-2 mb-5"
        type="text"
        v-model="value"
        placeholder="Search books"
      />

      <button
        v-if="value"
        class="p-2 mb-5 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white"
        @click="searchBooks"
      >
        Search
      </button>
    </div>

    <!-- Get All Books -->
    <div class="flex flex-wrap justify-center">
      <div v-for="book in data.data" :key="book.id" class="w-full max-w-sm m-5">
        <div class="bg-white rounded-xl shadow-lg p-6 h-full">
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3">
              <router-link :to="'/book/' + book.id">
                <div>
                  <h3 class="text-xl font-bold mb-2">
                    {{ book.title }}
                  </h3>

                  <span
                    class="inline-block bg-purple-200 rounded-full px-3 py-1 text-sm font-semibold text-purple-800 mr-2 mb-2"
                    >{{ book.genre }}</span
                  >

                  <p class="text-gray-700 text-base">
                    {{ book.description }}
                  </p>
                </div>
              </router-link>

              <h3 class="text-xl font-bold mt-2">Rs.{{ book.price }}</h3>

              <h3
                v-if="book.status == 'available'"
                class="text-center p-1 text-xl font-bold mt-2"
              >
                Available
              </h3>

              <h3
                v-if="book.status == 'borrowed'"
                class="text-center p-1 text-xl font-bold mt-2"
              >
                Borrowed
              </h3>

              <div>
                <div class="w-full">
                  <!-- Borrow Book -->
                  <button
                    v-if="book.status === 'available'"
                    class="w-full mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    @click="borrowBook(book.id)"
                  >
                    Borrow
                  </button>

                  <!-- Return Book -->
                  <button
                    v-if="book.status === 'borrowed'"
                    class="w-full mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                    @click="returnBook(book.id)"
                  >
                    Return
                  </button>
                </div>

                <div class="flex justify-between space-x-2">
                  <!-- Delete Book -->
                  <button
                    class="w-1/2 mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    @click="deleteBook(book.id)"
                  >
                    Delete
                  </button>

                  <!-- Edit Book -->
                  <router-link
                    class="text-center w-1/2 mt-2 bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded"
                    :to="{ path: '/book/edit/' + book.id }"
                  >
                    Edit
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Book -->
    <div class="flex justify-center">
      <router-link
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-10 mt-5"
        to="/book/add"
        >Add Book</router-link
      >
    </div>
  </div>
</template>

<script>
import repository from "@/api/repository";

export default {
  name: "BooksView",
  components: {},

  data() {
    return {
      data: [],
      page: 1,
      limit: 3,
      property: "title",
      value: "",
    };
  },
  watch: {
    page: function () {
      this.getBooks(this.page, this.limit);
    },
    limit: function () {
      this.getBooks(this.page, this.limit);
    },
  },
  mounted() {
    repository.getBooks(this.page, this.limit).then((response) => {
      this.data = response.data;
    });
  },
  methods: {
    getBooks() {
      repository.getBooks(this.page, this.limit).then((response) => {
        this.data = response.data;
      });
    },

    borrowBook(id) {
      repository.borrowBook(id).then((response) => {
        // update specific book status to borrowed
        this.data.data.find((book) => book.id === id).status =
          response.data.status;

        let sessionBooks = [];
        if (sessionStorage.getItem("books")) {
          sessionBooks = JSON.parse(sessionStorage.getItem("books"));
        }
        sessionBooks.push(response.data);
        sessionStorage.setItem("books", JSON.stringify(sessionBooks));
      });
    },

    returnBook(id) {
      repository.returnBook(id).then((response) => {
        // update specific book status to available
        this.data.data.find((book) => book.id === id).status =
          response.data.status;

        // remove book from session storage
        let sessionBooks = [];
        if (sessionStorage.getItem("books")) {
          sessionBooks = JSON.parse(sessionStorage.getItem("books"));
        }
        sessionBooks.splice(
          sessionBooks.findIndex((book) => book.id === id),
          1
        );
        sessionStorage.setItem("books", JSON.stringify(sessionBooks));
      });
    },

    deleteBook(id) {
      repository.deleteBook(id).then((response) => {
        // remove book from list
        this.data.data = this.data.data.filter(
          (book) => response.data.id !== book.id
        );
      });
    },

    searchBooks() {
      this.$router.push("/search/" + this.property + "/" + this.value);
    },
  },
};
</script>
