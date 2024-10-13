<script>
import { useAuthStore } from '@/storage/authStore';
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
  setup() {
    const router = useRouter();
    const authStore = useAuthStore();
    
    // Ambil kode otorisasi dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const authCode = urlParams.get('code');
    
    if (authCode) {
      // Kirim kode otorisasi ke backend (Laravel) untuk mendapatkan token
      axios.get(`http://localhost:8000/auth/google/callback?code=${authCode}`, {withCredentials: true})
      .then((response) => {
        localStorage.setItem('nama', response.data.Nama);
        localStorage.setItem('tkn', response.data.google_token);
        localStorage.setItem('lgn', response.data.login);
        localStorage.setItem('id', response.data.id);

        // Menggunakan action untuk memperbarui token dan user
        authStore.updateUser(response.data.Nama);
        authStore.setToken(response.data.google_token);
        authStore.updateId(response.data.id);

        // Redirect ke halaman utama atau dashboard
        router.push('/');
      })
      .catch(error => {
        console.error('Error exchanging authorization code', error);
        router.push('/login');
      });
    } else {
      console.error('Authorization code not found');
      router.push('/login');
    }
  }
}
</script>

