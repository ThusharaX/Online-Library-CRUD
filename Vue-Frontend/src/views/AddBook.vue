<template>
  <div>
    <h1 class="text-3xl font-bold mt-5 mb-5 text-center">Add Book</h1>

    <div class="flex justify-center">
      <div class="w-full max-w-sm m-5">
        <div class="bg-white rounded-xl shadow-lg p-6 h-full">
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="title"
              >
                Title
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="title"
                type="text"
                v-model="book.title"
              />
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="genre"
              >
                Genre
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="genre"
                type="text"
                v-model="book.genre"
              />
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="description"
              >
                Description
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description"
                type="text"
                v-model="book.description"
              />
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="price"
              >
                Price
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="price"
                type="text"
                v-model="book.price"
              />
            </div>
          </div>

          <!-- Add Book Button -->
          <button
            class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            @click="addBook"
          >
            Add Book
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import repository from "@/api/repository";

export default {
  name: "AddBookView",
  components: {},

  data() {
    return {
      book: {
        title: null,
        description: null,
        genre: null,
        price: null,
      },
    };
  },
  methods: {
    addBook() {
      repository.addBook(this.book).then((response) => {
        console.log(response);
        this.$router.push("/books");
      });
    },
    reloadPage() {
      window.location.reload();
    },
  },
};
</script>
