import jwt from 'jsonwebtoken';

export const jwtMiddleware = (handler) => async (req, res) => {
  // Obtém o token do cabeçalho de autorização
  const token = req.headers.authorization?.split(' ')[1];

  // Verifica se o token está presente
  if (!token) {
    return res.status(401).json({ message: 'Token ausente' });
  }

  try {
    // Verifica e decodifica o token
    const decoded = jwt.verify(token, process.env.JWT_SECRET);
    req.user = decoded; // Armazena os dados do usuário no request

    // Continua para o próximo handler
    return handler(req, res);
  } catch (error) {
    // Retorna erro se o token for inválido
    return res.status(401).json({ message: 'Token inválido' });
  }
};
