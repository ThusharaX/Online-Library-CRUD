<template>
  <div>
    <h1 class="text-3xl font-bold mt-5 mb-5 text-center">Book Details</h1>

    <div class="flex justify-center">
      <div class="w-full max-w-sm m-5">
        <div class="bg-white rounded-xl shadow-lg p-6 h-full">
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
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
  </div>
</template>

<!-- get url params -->
<script>
import repository from "@/api/repository";

export default {
  name: "BookView",
  data() {
    return {
      book: {},
    };
  },
  mounted() {
    this.getBook();
  },

  methods: {
    getBook() {
      repository.getBook(this.$route.params.id).then((response) => {
        this.book = response.data;
      });
    },

    borrowBook(id) {
      repository.borrowBook(id).then((response) => {
        // update specific book status to borrowed
        this.book.status = response.data.status;

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
        this.book.status = response.data.status;

        console.log(response.data);

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
        console.log(response.data);
        let sessionBooks = [];
        if (sessionStorage.getItem("books")) {
          sessionBooks = JSON.parse(sessionStorage.getItem("books"));
        }
        sessionBooks.splice(
          sessionBooks.findIndex((book) => book.id === id),
          1
        );
        sessionStorage.setItem("books", JSON.stringify(sessionBooks));
        this.$router.push("/books");
      });
    },
  },
};
</script>

<style></style>
