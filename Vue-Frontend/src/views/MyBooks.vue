<template>
  <div class="home">
    <h1 class="text-3xl font-bold mt-5 mb-5 text-center">My Books</h1>

    <!-- Get My Books -->
    <div class="flex flex-wrap justify-center">
      <div v-for="book in books" :key="book.id" class="w-full max-w-sm m-5">
        <div class="bg-white rounded-xl shadow-lg p-6 h-full">
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3">
              <router-link :to="'/book/' + book.id">
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
              </router-link>

              <h3 class="text-xl font-bold mt-2">Rs.{{ book.price }}</h3>

              <h3
                v-if="book.status == 'available'"
                class="bg-gray-300 rounded-3xl text-center p-1 text-xl font-bold mt-2"
              >
                Available
              </h3>

              <h3
                v-if="book.status == 'borrowed'"
                class="bg-gray-300 rounded-3xl text-center p-1 text-xl font-bold mt-2"
              >
                Borrowed
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Add Book -->
    <div class="flex justify-center">
      <router-link
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-10 mt-5"
        to="/books"
        >View All Books</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "BooksView",
  components: {},

  data() {
    return {
      books: [],
    };
  },

  mounted() {
    // get books from session storage
    this.books = JSON.parse(sessionStorage.getItem("books"));
  },
  methods: {},
};
</script>
