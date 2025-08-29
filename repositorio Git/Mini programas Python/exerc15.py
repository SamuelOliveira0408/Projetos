def frete(k, p):
    if k <= 50:
        f = 0
    elif k >= 51 and k <= 100:
        f = 50
    elif k >= 101 and k <= 150:
        f = 100
    else:
        return "Distância acima do limite"

    if p <= 5:
        v = 0
    elif p >= 6 and p <= 10:
        v = 5
    elif p >= 11 and p <= 15:
        v = 10
    elif p >= 16 and p <= 20:
        v = 15
    else:
        return "Peso acima do limite"

    frete = v + f
    return frete

k = int(input("Digite a quilometragem da entrega: "))
p = int(input("Digite o peso do produto: "))

print("preço do frete:", frete(k, p))
