<template>
  <div class="home">
    <h1 class="text-3xl font-bold mt-5 mb-5 text-center">
      Search Results for {{ property }} : {{ value }}
    </h1>

    <!-- Get All Books -->
    <div v-if="books.length > 0" class="flex flex-wrap justify-center">
      <div v-for="book in books" :key="book.id" class="w-full max-w-sm m-5">
        <div class="bg-white rounded-xl shadow-lg p-6 h-full">
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full px-3">
              <router-link :to="'/book/' + book.id">
                <h3 class="text-xl font-bold mb-2">
                  {{ book.title }}
                </h3>

                <span
                  class="inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-green-800 mr-2 mb-2"
                  >{{ book.genre }}</span
                >

                <p class="text-gray-700 text-base">
                  {{ book.description }}
                </p>
              </router-link>

              <h3 class="text-xl font-bold mt-2">Rs.{{ book.price }}</h3>

              <h3 class="text-xl font-bold mt-2">{{ book.status }}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-20" v-else>
      <h1 class="text-red-500 p-20 text-3xl font-bold text-center">
        No Books Found
      </h1>
    </div>
  </div>
</template>

<script>
import repository from "@/api/repository";

export default {
  name: "SearchResultView",
  components: {},

  data() {
    return {
      books: [],
      property: this.$route.params.property,
      value: this.$route.params.value,
    };
  },

  mounted() {
    this.searchBooks();
  },
  methods: {
    searchBooks() {
      repository.searchBooks(this.property, this.value).then((response) => {
        this.books = response.data;
      });
    },
  },
};
</script>
