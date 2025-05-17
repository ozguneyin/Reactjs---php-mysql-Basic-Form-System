import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';

function App() {
  const [formData, setFormData] = useState({
    ad: '',
    soyad: '',
    email: '',
    adres: ''
  });
  
  const [users, setUsers] = useState([]);
  const [message, setMessage] = useState('');
  const [messageType, setMessageType] = useState('');
  const [loading, setLoading] = useState(false);
  
  // API URL - Gerçek uygulamada kendi API URL'nizi kullanın
  const API_URL = 'http://localhost/form_system/api';
  
  useEffect(() => {
    // Sayfa yüklendiğinde kullanıcıları getir
    fetchUsers();
  }, []);
  
  const fetchUsers = async () => {
    try {
      const response = await axios.get(`${API_URL}/users`);
      if (response.data && response.data.records) {
        setUsers(response.data.records);
      }
    } catch (error) {
      console.error('Kullanıcılar getirilirken hata oluştu:', error);
    }
  };
  
  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };
  
  const handleSubmit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setMessage('');
    
    try {
      const response = await axios.post(`${API_URL}/users`, formData);
      
      setMessage(response.data.message);
      setMessageType('success');
      
      // Formu temizle
      setFormData({
        ad: '',
        soyad: '',
        email: '',
        adres: ''
      });
      
      // Kullanıcı listesini güncelle
      fetchUsers();
    } catch (error) {
      setMessage(error.response?.data?.message || 'Bir hata oluştu. Lütfen tekrar deneyin.');
      setMessageType('danger');
    } finally {
      setLoading(false);
    }
  };
  
  return (
    <div className="container mt-5">
      <div className="row">
        <div className="col-md-6">
          <div className="card">
            <div className="card-header">
              <h3>Kullanıcı Kayıt Formu</h3>
            </div>
            <div className="card-body">
              {message && (
                <div className={`alert alert-${messageType}`} role="alert">
                  {message}
                </div>
              )}
              
              <form onSubmit={handleSubmit}>
                <div className="mb-3">
                  <label htmlFor="ad" className="form-label">Ad</label>
                  <input
                    type="text"
                    className="form-control"
                    id="ad"
                    name="ad"
                    value={formData.ad}
                    onChange={handleChange}
                    required
                  />
                </div>
                
                <div className="mb-3">
                  <label htmlFor="soyad" className="form-label">Soyad</label>
                  <input
                    type="text"
                    className="form-control"
                    id="soyad"
                    name="soyad"
                    value={formData.soyad}
                    onChange={handleChange}
                    required
                  />
                </div>
                
                <div className="mb-3">
                  <label htmlFor="email" className="form-label">Email</label>
                  <input
                    type="email"
                    className="form-control"
                    id="email"
                    name="email"
                    value={formData.email}
                    onChange={handleChange}
                    required
                  />
                </div>
                
                <div className="mb-3">
                  <label htmlFor="adres" className="form-label">Adres</label>
                  <textarea
                    className="form-control"
                    id="adres"
                    name="adres"
                    value={formData.adres}
                    onChange={handleChange}
                    rows="3"
                    required
                  ></textarea>
                </div>
                
                <button 
                  type="submit" 
                  className="btn btn-primary"
                  disabled={loading}
                >
                  {loading ? 'Kaydediliyor...' : 'Kaydet'}
                </button>
              </form>
            </div>
          </div>
        </div>
        
        <div className="col-md-6">
          <div className="card">
            <div className="card-header">
              <h3>Kayıtlı Kullanıcılar</h3>
            </div>
            <div className="card-body">
              {users.length > 0 ? (
                <table className="table table-striped">
                  <thead>
                    <tr>
                      <th>Ad</th>
                      <th>Soyad</th>
                      <th>Email</th>
                      <th>Adres</th>
                    </tr>
                  </thead>
                  <tbody>
                    {users.map((user) => (
                      <tr key={user.id}>
                        <td>{user.ad}</td>
                        <td>{user.soyad}</td>
                        <td>{user.email}</td>
                        <td>{user.adres}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              ) : (
                <p className="text-center">Henüz kayıtlı kullanıcı bulunmamaktadır.</p>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default App;
