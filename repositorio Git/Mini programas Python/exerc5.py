def aprovado(nota):
    if nota >= 6:
        return "aprovado"
    else:
        return "reprovado"

nota = float(input("Digite sua nota em determinada disciplina: "))
print(aprovado(nota))