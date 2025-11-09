#!/usr/bin/env bash
# AIxtract API Example - Bash / cURL
# Extract structured data from PDFs using AI.

API_URL="https://aixtract2.p.rapidapi.com/extract"
RAPIDAPI_KEY="YOUR_RAPIDAPI_KEY"  # Replace with your key
RAPIDAPI_HOST="aixtract2.p.rapidapi.com"
FILE_PATH="invoice.pdf"

echo "📤 Uploading $FILE_PATH ..."
curl -s -X POST "$API_URL" \
  -H "x-rapidapi-key: ${RAPIDAPI_KEY}" \
  -H "x-rapidapi-host: ${RAPIDAPI_HOST}" \
  -F "file=@${FILE_PATH}" \
  -F "use_ai=true" \
  -F "extract_tables=true" \
| jq .
