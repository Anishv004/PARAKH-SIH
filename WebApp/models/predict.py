import joblib
import sys
import json

# Load the model
model = joblib.load('difficulty_prediction_model.pkl')

# Function to predict using the model
def predict(data):
    # Assuming 'data' is a dictionary where keys are the feature names and values are the feature values
    # Extract feature values and convert them to a list
    feature_values = [data[key] for key in data]
    
    # Make a prediction
    prediction = model.predict([feature_values])
    return prediction[0]

if __name__ == "__main__":
    # Get input data from PHP (passed via command-line arguments as JSON)
    input_data_json = sys.argv[1]
    input_data = json.loads(input_data_json)
    
    # Make a prediction
    result = predict(input_data)
    print(result)  # Send the prediction result back to PHP
