<?php
mutation {
  login(input: {
        email: "email@email.com",
        password: "password"
    }) {
    user {
      apiKey
    }
  }
}