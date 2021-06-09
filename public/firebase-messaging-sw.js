// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
var firebaseConfig = {
    apiKey: "AIzaSyAxsGBxyGZguovn7PXi56OiGtRZ7r01KRk",
    authDomain: "blijdeburen-a50e1.firebaseapp.com",
    projectId: "blijdeburen-a50e1",
    storageBucket: "blijdeburen-a50e1.appspot.com",
    messagingSenderId: "757430325202",
    appId: "1:757430325202:web:bf16a73e68ade753cb820b"
};

firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);

    const title = "Hello world is awesome";
    const options = {
        body: "Your notification message .",
        icon: "/firebase-logo.png",
    };

    return self.registration.showNotification(
        title,
        options,
    );
});