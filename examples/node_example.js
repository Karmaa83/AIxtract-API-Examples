/**
 * AIxtract API Example - Node.js
 * Extract structured data from PDFs using AI.
 * Requires: axios, form-data
 */

import axios from "axios";
import FormData from "form-data";
import fs from "fs";

// === Configuration ===
const API_URL = "https://ai-pdf-data-extractor-extract-invoices-tables-more1.p.rapidapi.com/extract";
const RAPIDAPI_KEY = "YOUR_RAPIDAPI_KEY"; // Replace with your key
const RAPIDAPI_HOST = "aixtract2.p.rapidapi.com";
const FILE_PATH = "./invoice.pdf";

// === Prepare form data ===
const form = new FormData();
form.append("file", fs.createReadStream(FILE_PATH));
form.append("use_ai", "true");
form.append("extract_tables", "true");

// === Request ===
axios
  .post(API_URL, form, {
    headers: {
      ...form.getHeaders(),
      "x-rapidapi-key": RAPIDAPI_KEY,
      "x-rapidapi-host": RAPIDAPI_HOST,
    },
  })
  .then((res) => {
    console.log("✅ Extraction successful");
    console.log("Document type:", res.data.document_type);
    console.log("Confidence:", res.data.confidence_score);
    console.log("Fields:", Object.keys(res.data.structured_data || {}));
  })
  .catch((err) => {
    console.error("❌ Error:", err.response?.data || err.message);
  });
