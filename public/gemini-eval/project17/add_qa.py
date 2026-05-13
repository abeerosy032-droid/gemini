import json
import sys
import datetime
import os

data_file = '/home/abeerosy032/.openclaw/workspace/gemini_evaluation/Project1/public/gemini-eval/project17/data.json'

def add_qa(question, answer):
    try:
        with open(data_file, 'r', encoding='utf-8') as f:
            content = f.read()
            data = json.loads(content) if content else []
    except (FileNotFoundError, json.JSONDecodeError):
        data = []

    new_id = len(data) + 1
    new_entry = {
        "id": new_id,
        "timestamp": datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S"),
        "question": question,
        "answer": answer
    }
    
    data.append(new_entry)
    
    with open(data_file, 'w', encoding='utf-8') as f:
        json.dump(data, f, ensure_ascii=False, indent=4)
        
    print(f"Successfully added Q&A #{new_id}")

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Usage: python add_qa.py 'question' 'answer'")
        sys.exit(1)
        
    add_qa(sys.argv[1], sys.argv[2])
