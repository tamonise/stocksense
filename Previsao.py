import sys
import json
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.linear_model import LinearRegression
import numpy as np

# Verificar se o arquivo JSON foi passado como argumento
if len(sys.argv) < 2:
    print("Erro: Arquivo JSON não fornecido.")
    sys.exit(1)

# Ler o arquivo JSON enviado pelo PHP
json_file = sys.argv[1]
with open(json_file, 'r') as file:
    data = json.load(file)

# Converta os dados para um DataFrame do pandas
df = pd.DataFrame(data)
df['Data'] = pd.to_datetime(df['Data'], format='%Y-%m')

# Prevendo as vendas futuras
# Regressão linear simples para prever as vendas
X = np.array(range(len(df))).reshape(-1, 1)  # Meses
y = df['Vendas'].values  # Vendas históricas

model = LinearRegression()
model.fit(X, y)

# Previsões para os próximos meses
future_months = 12  # Por exemplo, prever para os próximos 12 meses
future_X = np.array(range(len(df), len(df) + future_months)).reshape(-1, 1)
predicted_sales = model.predict(future_X)

# Estimativa do estoque futuro, assumindo que o estoque diminui conforme as vendas
# Adicionamos a previsão de estoque com base no estoque inicial e nas vendas previstas
predicted_estoque = np.copy(df['Estoque'].values)  # Copiar os valores de estoque existentes

# Subtrai as vendas previstas do estoque para os meses futuros
predicted_estoque = np.concatenate([predicted_estoque, np.zeros(future_months)])  # Inicializa o estoque futuro com zeros
for i in range(future_months):
    predicted_estoque[len(df) + i] = predicted_estoque[len(df) + i - 1] - predicted_sales[i]

# Plotar o gráfico
plt.figure(figsize=(10, 6))

# Gráfico de vendas históricas
plt.plot(df['Data'], df['Vendas'], label='Vendas Históricas', color='blue', marker='o')

# Gráfico de estoque atual
plt.plot(df['Data'], df['Estoque'], label='Estoque Atual', color='green', marker='x')

# Adicionando a previsão de vendas
future_dates = pd.date_range(df['Data'].iloc[-1], periods=future_months + 1, freq='M')[1:]
plt.plot(future_dates, predicted_sales, label='Vendas Previstas', color='red', linestyle='--', marker='x')

# Adicionando a previsão de estoque
plt.plot(future_dates, predicted_estoque[len(df):], label='Estoque Previsto', color='orange', linestyle='--', marker='o')

# Títulos e rótulos
plt.title('Previsão de Vendas e Estoque')
plt.xlabel('Data')
plt.ylabel('Quantidade')
plt.legend()

# Exibindo o gráfico
plt.xticks(rotation=45)
plt.tight_layout()
plt.show()
