"""
AIxtract API Example - Python
Extract structured data from PDFs using AI.
Powered by Claude AI + FastAPI
"""

import requests

# === Configuration ===
API_URL = "https://ai-pdf-data-extractor-extract-invoices-tables-more1.p.rapidapi.com/extract"
RAPIDAPI_KEY = "YOUR_RAPIDAPI_KEY"  # Replace with your RapidAPI key
RAPIDAPI_HOST = "aixtract2.p.rapidapi.com"

# === File to process ===
PDF_FILE = "invoice.pdf"

# === Request ===
headers = {
    "x-rapidapi-key": RAPIDAPI_KEY,
    "x-rapidapi-host": RAPIDAPI_HOST
}

files = {"file": open(PDF_FILE, "rb")}
data = {
    "use_ai": "true",           # Enables AI-powered extraction
    "extract_tables": "true"    # Extracts tables if found
}

response = requests.post(API_URL, headers=headers, files=files, data=data)

# === Result ===
if response.status_code == 200:
    result = response.json()
    print("✅ Extraction successful")
    print(f"Document type: {result.get('document_type')}")
    print(f"Confidence: {result.get('confidence_score')}")
    print(f"Fields: {list(result.get('structured_data', {}).keys())}")
else:
    print("❌ Error:", response.status_code, response.text)
