<template>
    <div>
      <h1>Create Supplier</h1>
      <form @submit.prevent="submitSupplier">
        <input v-model="supplier.name" placeholder="Supplier Name" required />
        <input v-model="supplier.contact_email" placeholder="Contact Email" required />
        <button type="submit">Create Supplier</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        supplier: {
          name: '',
          contact_email: ''
        }
      };
    },
    methods: {
      async submitSupplier() {
        try {
          await axios.post('/api/suppliers', this.supplier);
          alert('Supplier created successfully!');
          this.supplier.name = '';
          this.supplier.contact_email = '';
        } catch (error) {
          console.error(error);
          alert('Something went wrong!');
        }
      }
    }
  }
  </script>  