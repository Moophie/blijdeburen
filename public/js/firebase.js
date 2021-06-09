// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyAxsGBxyGZguovn7PXi56OiGtRZ7r01KRk",
  authDomain: "blijdeburen-a50e1.firebaseapp.com",
  projectId: "blijdeburen-a50e1",
  storageBucket: "blijdeburen-a50e1.appspot.com",
  messagingSenderId: "757430325202",
  appId: "1:757430325202:web:bf16a73e68ade753cb820b"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();


function startFCM() {
  messaging
      .requestPermission()
      .then(function () {
          return messaging.getToken()
      })
      .then(function (response) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url: 'https://blijdeburen.test/store-token',
              type: 'POST',
              data: {
                  token: response
              },
              dataType: 'JSON',
              success: function (response) {
                  alert('Token stored.');
              },
              error: function (error) {
                  alert(error);
              },
          });

      }).catch(function (error) {
          alert(error);
      });
}

messaging.onMessage(function (payload) {
  const title = payload.notification.title;
  const options = {
      body: payload.notification.body,
      icon: payload.notification.icon,
  };
  new Notification(title, options);
});