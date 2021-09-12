import axios from "axios";

const url = "https://ediaristas-workshop.herokuapp.com";
// /api/diaristas-cidade?cep=01001000

export const ApiService = axios.create({
  baseURL: url,
  headers: {
    "Content-Type": "application/json",
  },
});
