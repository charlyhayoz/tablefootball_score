import { Player } from './player';
export interface Game {
  id?: number;
  status: string;
  player1_id: number;
  player2_id: number;
  player1_score: number;
  player2_score: number;
  created_at?: string;
  player1?: Player;
  player2?: Player;
}
